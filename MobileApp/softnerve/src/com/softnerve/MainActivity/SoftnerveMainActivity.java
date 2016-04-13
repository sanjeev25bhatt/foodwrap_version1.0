package com.softnerve.MainActivity;

import com.softnerve.common.softnerveconst;
import com.softnerve.main.softnerveWebchromeclient;
import com.softnerve.main.softnerveWebclient;

import android.annotation.SuppressLint;
import android.app.Activity;
import android.os.Bundle;
import android.support.v7.appcompat.test.R;
import android.view.KeyEvent;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.widget.ProgressBar;

public class SoftnerveMainActivity extends Activity {

	WebView _sofnerveWebviewObject = null;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.softnervewebview);
		View viewtempObject = (WebView) findViewById(R.id.softnerveWebview);
		loadSoftnerveWeview(viewtempObject);
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.softnerve_main, menu);
		return true;
	}

	/*
	 * @Override public boolean onOptionsItemSelected(MenuItem item) { // Handle
	 * action bar item clicks here. The action bar will // automatically handle
	 * clicks on the Home/Up button, so long // as you specify a parent activity
	 * in AndroidManifest.xml. int id = item.getItemId(); if (id ==
	 * R.id.action_settings) { return true; } return
	 * super.onOptionsItemSelected(item); }
	 */
	@SuppressLint("SetJavaScriptEnabled")
	private void loadSoftnerveWeview(View aView) {

		_sofnerveWebviewObject = (WebView) aView.findViewById(R.id.softnerveWebview);

		WebSettings mWebSetting = _sofnerveWebviewObject.getSettings();
		_sofnerveWebviewObject.getSettings().setJavaScriptCanOpenWindowsAutomatically(true);
		_sofnerveWebviewObject.getSettings().setBuiltInZoomControls(true);

		_sofnerveWebviewObject.setWebViewClient(new softnerveWebclient());

		mWebSetting.setJavaScriptEnabled(true);
		_sofnerveWebviewObject.getSettings().setGeolocationEnabled(true);
		mWebSetting.setUseWideViewPort(true);
		mWebSetting.setLoadWithOverviewMode(true);
		_sofnerveWebviewObject.getSettings().setAppCacheEnabled(true);
		_sofnerveWebviewObject.getSettings().setDatabaseEnabled(true);
		_sofnerveWebviewObject.getSettings().setDomStorageEnabled(true);

		_sofnerveWebviewObject.setWebChromeClient(new softnerveWebchromeclient());

		_sofnerveWebviewObject.loadUrl(softnerveconst.HOMEPAGE_SOFTNEVE);
	}

	@Override
	public boolean onKeyDown(int keyCode, KeyEvent event) {
		// TODO Auto-generated method stub
		if (keyCode == KeyEvent.KEYCODE_BACK && _sofnerveWebviewObject.canGoBack()) {
			_sofnerveWebviewObject.goBack();
			return true;
		}
		return super.onKeyDown(keyCode, event);
	}

}
