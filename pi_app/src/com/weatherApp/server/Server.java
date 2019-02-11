package com.weatherApp.server;

import java.io.IOException;
import java.net.ServerSocket;

public class Server {

    private static final int PORT = 7789;
    private ServerSocket serverSocket;

    private boolean running;

    public Server() {
        try {
            this.serverSocket = new ServerSocket(PORT);
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    public void start() {
        System.out.println("Starting server");
        running = true;
        run();
    }

    private void run() {
        while (running) {
            try {
                ServerThread thread = new ServerThread(serverSocket.accept());
                thread.start();
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
    }

}
