package com.freshwrapp.Androidapp;

import com.freshwrapp.constant.freshwrappconst;

import android.annotation.SuppressLint;
import android.app.Fragment;
import android.content.Context;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.webkit.WebSettings;
import android.webkit.WebView;
import freshwrapdelete.FreshWrapwebClient;

public class FreshwrappSecondFragement extends Fragment {

	@Override
	public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreateView(inflater, container, savedInstanceState);

		View aView = inflater.inflate(R.layout.fragment_two, container, false);
		onLoadWebView(aView);
		return aView;
	}

	@SuppressLint("SetJavaScriptEnabled")
	private void onLoadWebView(View aView) {

		WebView mWebView = (WebView) aView.findViewById(R.id.webview);
		WebSettings mWebSetting = mWebView.getSettings();
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

		mWebView.loadUrl(freshwrappconst.HOMEPAGE);
	}
}
