package com.freshwrapp.Androidapp;

import android.app.Activity;
import android.app.Fragment;
import android.content.Intent;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;

public class freshwrappSplashscreen extends Activity {

	/*
	 * @Override public View onCreateView(LayoutInflater inflater, ViewGroup
	 * container, Bundle savedInstanceState) { // TODO Auto-generated method
	 * stub super.onCreateView(inflater, container, savedInstanceState); return
	 * inflater.inflate(R.layout.splashscreen, container, false); }
	 */

	@Override
	public void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);
		setContentView(R.layout.splashscreen);
		final Intent mm = new Intent(this, FreshWrapMainActivity.class);
		Thread background = new Thread() {
			@Override
			public void run() {
				// TODO Auto-generated method stub
				super.run();
				try {
					sleep(5000);
					
				} catch (InterruptedException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
				finally {
					startActivity(mm);
					finish();
				}

			}
		};

		 background.start();
	}
}
