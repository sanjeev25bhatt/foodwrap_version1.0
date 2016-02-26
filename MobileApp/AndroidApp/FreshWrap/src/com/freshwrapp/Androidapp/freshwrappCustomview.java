package com.freshwrapp.Androidapp;

import android.content.Context;
import android.graphics.Canvas;
import android.graphics.Color;
import android.graphics.Paint;
import android.support.v4.view.ViewPager;
import android.util.AttributeSet;
import android.view.LayoutInflater;
import android.view.View;
import android.widget.LinearLayout;
import android.widget.ScrollView;

public class freshwrappCustomview extends LinearLayout {

	private Paint _mPaint = new Paint();
	View mViewxx;
	View mtingo;

	public freshwrappCustomview(Context context, AttributeSet attrs) {
		super(context, attrs);
		init(attrs, 0);

		View v = addView(context);
		addViewPager(v);
		addListview(v, context);
		// _mImageView = (ImageView) findViewById(R.id.smile);
		// TODO Auto-generated constructor stub
	}

	@Override
	protected void onDraw(Canvas canvas) {
		// TODO Auto-generated method stub
		super.onDraw(canvas);

	}

	private void init(AttributeSet attrs, int defStyle) {
		_mPaint.setColor(Color.YELLOW);

	}

	View addView(Context context) {
		LayoutInflater inflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
		View mView = inflater.inflate(R.layout.fragment_dummy, this);
		mtingo = inflater.inflate(R.layout.tingo, this);
		return mView;
	}

	void addViewPager(View aView) {

		ViewPager mPag = (ViewPager) aView.findViewById(R.id.pager_d);
		freshWrappImageAdapater td = new freshWrappImageAdapater(mPag.getContext());
		mPag.setAdapter(td);
	}

	void addListview(View aView, Context context) {

		ScrollView viewList = (ScrollView) aView.findViewById(R.id.scview);

		LinearLayout linear1_c = (LinearLayout) viewList.findViewById(R.id.linear1_c);
		ViewPager mPag = new ViewPager(context);
		// ViewPager mPag = (ViewPager) viewList.findViewById(R.id.pager_p11);
		freshWrappImageAdapater td = new freshWrappImageAdapater(mPag.getContext());
		mPag.setAdapter(td);
		linear1_c.addView(mPag);

		ViewPager mPag1 = (ViewPager) new ViewPager(context);

		mPag1.setMinimumWidth(100);
		// ViewPager mPag = (ViewPager) viewList.findViewById(R.id.pager_p11);
		freshWrappImageAdapater td1 = new freshWrappImageAdapater(mPag1.getContext());
		mPag1.setAdapter(td1);

		linear1_c.addView(mPag1);

		/*
		 * ViewPager mPag1 = (ViewPager) mtingo.findViewById(R.id.pager_p11);
		 * freshWrappImageAdapater td1 = new
		 * freshWrappImageAdapater(mPag1.getContext()); mPag1.setAdapter(td1);
		 * //linear1_c.addView(mPag1); viewList.removeAllViews();
		 */
		// viewList.addView(linear1_c);
	}
}
