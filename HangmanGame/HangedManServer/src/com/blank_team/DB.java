package com.blank_team;

import jdk.jshell.spi.ExecutionControl;
import org.jetbrains.annotations.Contract;

import javax.swing.plaf.nimbus.State;
import java.sql.*;

public class DB {
    private final String db;
    private final String userName;
    private final String password;

    @Contract(pure = true) //Leave this, it's just here because IntelliJ likes it :)
    public DB(String db, String userName, String password){

        this.db = db;
        this.userName = userName;
        this.password = password;
    }

    private Connection GetConnection(){
        String url = "jdbc:mysql://localhost:3306/"+
                db+
                "?useUnicode=true"+
                "&useJDBCCompliantTimezoneShift=true"+
                "&useLegacyDatetimeCode=false"+
                "&serverTimezone=GMT%2B1";

        System.out.println("Connecting database...");

        try {
            Connection connection = DriverManager.getConnection(url, userName, password);
            System.out.println("Database connected!");
            return connection;
        } catch (SQLException e) {
            throw new IllegalStateException("Cannot connect the database!", e);
        }
    }

    public String RegisterUser(String usr, String email, String psw) throws SQLException, ClientError {
        String q = "SELECT COUNT(email) FROM user WHERE email = ?";
        try {
            psw = PasswordStorage.createHash(psw);
        } catch (PasswordStorage.CannotPerformOperationException e) {
            e.printStackTrace();
        }
        try (Connection connection = GetConnection(); PreparedStatement stmt = connection.prepareStatement(q)) {
            stmt.setString(1, email);
            ResultSet resultSet = stmt.executeQuery();
            resultSet.next();
            int count = resultSet.getInt(1);
            if(count != 0){
                throw new ClientError("Email exists");
            }

            PreparedStatement stmt2 = connection.prepareStatement("SELECT COUNT(usr) FROM user WHERE usr = ?");
            stmt2.setString(1, usr);
            resultSet = stmt2.executeQuery();
            resultSet.next();
            count = resultSet.getInt(1);
            if(count != 0){
                throw  new ClientError("Username exists");
            }

            PreparedStatement stmt3 = connection.prepareStatement("INSERT INTO `user` (`id`, `usr`, `email`, `psw`, `score`) VALUES (NULL, ?, ?, ?, '0')");
            stmt3.setString(1, usr);
            stmt3.setString(2, email);
            stmt3.setString(3, psw);
            stmt3.execute();
            System.out.println("User inserted");
        } catch (SQLException e) {
            throw new SQLException("Cannot create statement: " + e.getMessage(), e);
        }
        return "";
    }

    public User Login(String userName, String password) throws SQLException, ClientError {
        User user = null;
        try (Connection connection = GetConnection(); PreparedStatement stmt = connection.prepareStatement(
                "SELECT usr, email, psw, score FROM user WHERE usr = ? OR email = ?"
        )) {
            stmt.setString(1, userName);
            stmt.setString(2, userName); //User can log in with email also, yay!
            ResultSet resultSet = stmt.executeQuery();
            String psw = null;
            while (resultSet.next()){
                String usr = resultSet.getString(1);
                String email = resultSet.getString(2);
                psw = resultSet.getString(3);
                int score = resultSet.getInt(4);
                user = new User(usr, email, score);
            }
            if(user == null){
                throw new ClientError((userName.contains("@") ? "Email" : "Username") + " doesn't exists");
            }
            if (!PasswordStorage.verifyPassword(password, psw)) {
                throw new ClientError("Password mismatch");
            }
        } catch (SQLException e) {
            throw new SQLException("Cannot create statement: "+e.getMessage(), e);
        } catch (PasswordStorage.CannotPerformOperationException | PasswordStorage.InvalidHashException e) {
            e.printStackTrace();
        }
        return user;
    }

    public boolean AddGame(String p1, String p1_word){
        //TODO: game_log, scoring system
        return false;
    }
}
