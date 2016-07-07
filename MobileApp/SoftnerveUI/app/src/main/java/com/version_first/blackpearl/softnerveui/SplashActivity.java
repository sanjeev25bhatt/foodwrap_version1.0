package com.version_first.blackpearl.softnerveui;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;

public class SplashActivity extends Activity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        // TODO Auto-generated method stub
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_splash);
        Thread timer = new Thread(){
            public void run(){
                try{
                    sleep(4000);
                } catch(InterruptedException e){
                    e.printStackTrace();
                } finally{
                    Intent openStartingPoint = new Intent(SplashActivity.this, MainActivity.class);
                    startActivity(openStartingPoint);
                }
            }
        };
        timer.start();
    }
    protected void onPause(){
        super.onPause();
        finish();
    }
}
