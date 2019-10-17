package com.blank_team;

public class ClientError extends Exception {
    public ClientError(String message) {
        super("Client error: "+message);
    }
}
