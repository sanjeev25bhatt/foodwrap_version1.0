package com.freshwrapp.Androidapp;

import android.app.Application;
import android.content.Context;


public class freshwrapApplication extends Application{
	
	Context mContext ;
	public void setContext (Context aContext)
	{
		mContext = aContext ;
	}
	public Context getContext()
	{
		return mContext ;
	}
}
