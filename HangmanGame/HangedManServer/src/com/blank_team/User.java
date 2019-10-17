package com.blank_team;

import org.jetbrains.annotations.Contract;

public class User {
    private final int id;
    private final String username;
    private final String email;
    private int score;

    @Contract(pure = true)
    public User(int id, String username, String email, int score){
        this.id = id;
        this.username = username;
        this.email = email;
        this.score = score;
    }
    public int AddScore(int value){
        this.score += value;
        return this.score;
    }

    public String getUsername() {
        return username;
    }

    public String getEmail() {
        return email;
    }

    public int getScore() {
        return score;
    }

    public int getId() {
        return id;
    }
}
