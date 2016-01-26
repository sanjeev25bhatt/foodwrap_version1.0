package com.freshwrapp.Androidapp;

import android.net.Uri;
import android.webkit.WebView;
import android.webkit.WebViewClient;

public class FreshWrapwebClient extends WebViewClient  {

	@Override
	public boolean shouldOverrideUrlLoading(WebView view, String url) {
		// TODO Auto-generated method stub
		if(Uri.parse(url).getHost().equals("http://192.168.0.7/sanjeev_test/foodwrap_version1.0/xxx/contact.php")
	|| Uri.parse(url).getHost().equals("http://192.168.0.7/sanjeev_test/foodwrap_version1.0/xxx/dashboard.php"))
			return false ;
		return super.shouldOverrideUrlLoading(view, url);
	}
}
