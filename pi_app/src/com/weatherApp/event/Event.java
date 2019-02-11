package com.weatherApp.event;

import java.util.ArrayList;

public class Event<T> {

    public interface Listener<T> {
        void callback(T value);
    }

    private ArrayList<Listener<T>> listeners;

    public Event() {
        listeners = new ArrayList<>();
    }

    public void addListener(Listener<T> listener) {
        listeners.add(listener);
    }

    public void call(T value) {
        listeners.forEach((listener -> {
            listener.callback(value);
        }));
    }

}
