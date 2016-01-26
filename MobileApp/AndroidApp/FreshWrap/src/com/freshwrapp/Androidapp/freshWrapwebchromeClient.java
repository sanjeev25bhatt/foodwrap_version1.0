package com.freshwrapp.Androidapp;

import android.app.AlertDialog;
import android.webkit.JsResult;
import android.webkit.WebChromeClient;
import android.webkit.WebView;
import android.webkit.GeolocationPermissions.Callback;

public class freshWrapwebchromeClient extends WebChromeClient{

	@Override
	public boolean onJsAlert(WebView view, String url, String message, JsResult result) {
		// TODO Auto-generated method stub
		new AlertDialog.Builder(view.getContext())
        .setMessage(message).setCancelable(true).show();
       result.confirm();
       return true;
	}
	@Override
	public void onGeolocationPermissionsShowPrompt(String origin, Callback callback) {
		// TODO Auto-generated method stub
		super.onGeolocationPermissionsShowPrompt(origin, callback);
		callback.invoke(origin, true, false);
	}
}
