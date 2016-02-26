package com.freshwrapp.Androidapp;



import android.app.Activity;
import android.app.Fragment;
import android.content.Intent;
import android.os.Bundle;
import android.support.v4.view.ViewPager;
import android.support.v7.app.ActionBarActivity;
import android.support.v7.widget.CardView;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.support.v7.widget.RecyclerView.LayoutManager;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;

public class freshWrapPagerfragment extends Fragment {

	private RecyclerView _mrecycleView;
	private RecyclerView.LayoutManager _mlayoutManager;

	@Override
	public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreateView(inflater, container, savedInstanceState);
		View _mView = inflater.inflate(R.layout.recycler_view, container, false);
		_mrecycleView = (RecyclerView) _mView.findViewById(R.id.myrecy);
		_mlayoutManager = new LinearLayoutManager(getActivity().getApplicationContext());
		_mrecycleView.setLayoutManager(_mlayoutManager);
		_mrecycleView.setHasFixedSize(true);

		ViewPager mPag = (ViewPager) _mView.findViewById(R.id.pager1);
		freshWrappImageAdapater td = new freshWrappImageAdapater(mPag.getContext());
		mPag.setAdapter(td);
		
		String[] data = { "1", "2", "3", "4", "5", "6" };
		CardViewDataAdapter _mAdapter = new CardViewDataAdapter(data);
		_mrecycleView.setAdapter(_mAdapter);

		return _mView;
	}

}
