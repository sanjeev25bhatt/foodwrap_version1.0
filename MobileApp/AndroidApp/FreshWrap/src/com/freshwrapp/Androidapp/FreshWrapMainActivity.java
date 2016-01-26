package com.freshwrapp.Androidapp;


import android.app.Activity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.webkit.WebChromeClient;
import android.webkit.WebSettings;
import android.webkit.WebView;

public class FreshWrapMainActivity extends Activity {

	private static final String mHomePage = "http://192.168.0.7/sanjeev_test/foodwrap_version1.0/xxx/";

	@Override

	
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		WebView mWebView = (WebView) findViewById(R.id.webview);
		WebSettings mWebSetting = mWebView.getSettings() ;
		 mWebView.getSettings().setJavaScriptCanOpenWindowsAutomatically(true);
	        mWebView.getSettings().setBuiltInZoomControls(true);
	        mWebView.setWebViewClient(new FreshWrapwebClient());
	        
		mWebSetting.setJavaScriptEnabled(true);
		mWebView.getSettings().setGeolocationEnabled(true);
		mWebSetting.setUseWideViewPort(true);
		mWebSetting.setLoadWithOverviewMode(true);
		mWebView.getSettings().setAppCacheEnabled(true);
		mWebView.getSettings().setDatabaseEnabled(true);
		mWebView.getSettings().setDomStorageEnabled(true);
		
		mWebView.setWebChromeClient(new freshWrapwebchromeClient());
		
		mWebView.loadUrl(mHomePage);
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}

	@Override
	public boolean onOptionsItemSelected(MenuItem item) {
		// Handle action bar item clicks here. The action bar will
		// automatically handle clicks on the Home/Up button, so long
		// as you specify a parent activity in AndroidManifest.xml.
		int id = item.getItemId();
		if (id == R.id.action_settings) {
			return true;
		}
		return super.onOptionsItemSelected(item);
	}
}
