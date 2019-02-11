package com.weatherApp.server;


import com.weatherApp.event.Event;

import java.io.DataInputStream;
import java.io.IOException;
import java.net.Socket;
import java.util.Arrays;

public class ServerThread extends Thread {

    public static final Event<byte[]> dataEvent = new Event<>();

    private Socket socket;

    public ServerThread(Socket socket) {
        System.out.println("Connection opened: " + socket.getPort());
        this.socket = socket;
    }

    @Override
    public void run() {
        try {
            DataInputStream in = new DataInputStream(socket.getInputStream());

            ByteBuffer byteBuffer = new ByteBuffer();
            while (true) {
                byte[] bytes = new byte[32];

                if (in.read(bytes) <= 0) {
                    System.out.println("Connection closed: " + socket.getPort());
                    break;
                }

                int i = bytes.length - 1;
                while (i >= 0 && bytes[i] == 0)  {
                    --i;
                }

                byteBuffer.add(Arrays.copyOf(bytes, i + 1));

                if (byteBuffer.size() <= 3360) {
                    continue;
                }

                dataEvent.call(byteBuffer.cut(findEnd(byteBuffer)));
            }

            this.socket.close();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    private int findEnd(ByteBuffer byteBuffer) {
        final String end = "</WEATHERDATA>";

        byte[] bytes = byteBuffer.bytes();
        for (int i = bytes.length - 1; i > 0; i--) {
            char c = (char) bytes[i];
            int index = (i + 1) - end.length();

            if (index < 0) {
                break;
            }

            if (c == '>') {
                String checker = new String(bytes, index, end.length());
                if (checker.equals("</WEATHERDATA>")) {
                    //System.out.println(i + " : " + byteBuffer.size());
                    return i;
                }
            }
        }

        return 0;
    }

}
