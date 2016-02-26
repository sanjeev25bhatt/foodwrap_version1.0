package com.freshwrapp.Androidapp;

import android.content.Context;
import android.support.v4.view.PagerAdapter;
import android.support.v4.view.ViewPager;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.RelativeLayout;
import android.widget.ScrollView;
import android.widget.TextView;

public class freshWrappImageAdapater extends PagerAdapter {
	Context context;
	LayoutInflater mLayoutInflater;
	int flag = 0;
	View _view;
	int[] Resource = { R.drawable.deal1, R.drawable.deal2, R.drawable.deal3 };

	freshWrappImageAdapater(Context context) {
		this.context = context;
		mLayoutInflater = (LayoutInflater) context.getSystemService(context.LAYOUT_INFLATER_SERVICE);
	}

	freshWrappImageAdapater(Context context, View view, int tt) {
		this.context = context;
		mLayoutInflater = (LayoutInflater) context.getSystemService(context.LAYOUT_INFLATER_SERVICE);
		flag = tt;
		_view = view;
	}

	@Override
	public int getCount() {
		// TODO Auto-generated method stub
		return Resource.length;
	}

	@Override
	public boolean isViewFromObject(View arg0, Object arg1) {
		// TODO Auto-generated method stub
		return arg0 == ((RelativeLayout) arg1);
	}

	@Override
	public Object instantiateItem(ViewGroup container, int position) {
		// TODO Auto-generated method stub
		ScrollView viewList = null;

		View mm = mLayoutInflater.inflate(R.layout.pager_item, container, false);
		ImageView imageView = (ImageView) mm.findViewById(R.id.imageView);
		imageView.setImageResource(Resource[position]);

		container.addView(mm);
		return mm;
	}

	@Override
	public void destroyItem(ViewGroup container, int position, Object object) {
		((ViewPager) container).removeView((RelativeLayout) object);

	}
}
