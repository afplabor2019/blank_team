package com.blank_team;

import java.sql.SQLException;
import java.util.Random;

public class _DEBUG {

    private static Random rnd = new Random();

    public static void AddTestUsers(int n) {
        AddTestUsers(n, "TEST_");
    }

    public static void AddTestUsers(int n, String psw){
        DB db = new DB("hanged_man", "root", "");
        for(int i = 0; i<n;i++){
            try {
                db.RegisterUser("Test_User"+i, "test"+i+"@example.com", psw+i);
            } catch (SQLException | ClientError e) {
                e.printStackTrace();
            }
        }
    }

    public static void AddTestGames(int n) {
        AddTestGames(n, "TEST_");
    }

    public static void AddTestGames(int n, String psw){
        DB db = new DB("hanged_man", "root", "");
        User user = new User(-1, "", "", -1);
        String word = "";
        for (int i = 0; i<n; i++){
            int x = rnd.nextInt(100);
            try {
                user = db.Login("Test_User"+x, psw+x);
                System.out.println("User Login:"+user.getUsername());
                word = db.GetRandomWord();
                System.out.println("Word is "+word);
                db.AddGame(user, word);
            } catch (SQLException | ClientError e) {
                System.out.println("ERR: "+user.getUsername()+" : "+word);
                e.printStackTrace();
            }
        }
    }
}
