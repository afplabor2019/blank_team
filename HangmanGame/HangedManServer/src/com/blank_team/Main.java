package com.blank_team;

import java.sql.SQLException;

public class Main {

    public static void main(String[] args) {
        DB database = new DB("hanged_man", "root", "");
        //database.RegisterUser("test3", "test3@example.com", "123456789");
        //database.AddGame(user, "alma");
        ThreadPooledServer server = new ThreadPooledServer(9000);
        new Thread(server).start();

        try {
            Thread.sleep(20 * 1000);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
        System.out.println("Stopping Server");
        server.stop();

    }
}
