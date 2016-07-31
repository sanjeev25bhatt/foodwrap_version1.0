package com.softnerve.main;

import com.softnerve.common.softnerveconst;

import android.net.Uri;
import android.support.v7.appcompat.test.R;
import android.util.Log;
import android.view.View;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.ProgressBar;

public class softnerveWebclient extends WebViewClient {

	public static final String TAG = "softnerveWebclient";
	
	@Override
	public boolean shouldOverrideUrlLoading(WebView view, String url) {
		// TODO Auto-generated method stub

		if (Uri.parse(url).getHost().equals(softnerveconst.HOMEPAGE_SOFTNEVE))
			return false;
		else
			return super.shouldOverrideUrlLoading(view, url);
	}

	@Override
	public void onPageFinished(WebView view, String url) {
		// TODO Auto-generated method stub
		super.onPageFinished(view, url);
		((View) view.getParent()).findViewById(R.id.softnerveProgressBar).setVisibility(View.GONE);
		// mProgressBarObject.setVisibility(View.GONE);
		Log.d(TAG, "onPageFinished");
	}
}
