package com.weatherApp.server;

import java.util.ArrayList;
import java.util.Arrays;

public class ByteBuffer {

    private ArrayList<byte[]> buffer;

    public ByteBuffer() {
        buffer = new ArrayList<>();
    }

    public void add(byte[] bytes) {
        buffer.add(bytes);
    }

    public int size() {
        return buffer.stream().mapToInt(bytes -> bytes.length).sum();
    }

    public void clear() {
        buffer.clear();
    }

    public byte[] cut(int index) {
        byte[] bytes = bytes();
        byte[] cut = Arrays.copyOf(bytes, index + 1);
        byte[] newBytes = Arrays.copyOfRange(bytes, cut.length + 1, bytes.length);

        clear();
        add(newBytes);

        return cut;
    }

    public byte[] bytes() {
        final byte[] ret = new byte[size()];

        int i = 0;
        for(byte[] bytes : buffer) {
            for (byte b : bytes) {
                ret[i] = b;
                i++;
            }
        }

        return ret;
    }

}
