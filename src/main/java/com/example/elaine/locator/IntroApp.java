package com.example.elaine.locator;

import android.app.Application;

public class IntroApp extends Application {

    @Override
    public void onCreate() {
        super.onCreate();

        Globals.init(this);
    }
}
