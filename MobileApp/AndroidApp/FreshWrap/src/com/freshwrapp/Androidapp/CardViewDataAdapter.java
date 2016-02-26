package com.freshwrapp.Androidapp;

import android.support.v4.view.ViewPager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

public class CardViewDataAdapter extends RecyclerView.Adapter<CardViewDataAdapter.ViewHolder> {
	public String[] mDataset;

	// Provide a suitable constructor (depends on the kind of dataset)
	public CardViewDataAdapter(String[] myDataset) {
		mDataset = myDataset;
	}

	// Create new views (invoked by the layout manager)
	@Override
	public CardViewDataAdapter.ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
		// create a new view
		View itemLayoutView = LayoutInflater.from(parent.getContext()).inflate(R.layout.recycler_view, null);

		// create ViewHolder

		ViewHolder viewHolder = new ViewHolder(itemLayoutView);
		return viewHolder;
	}

	// Replace the contents of a view (invoked by the layout manager)
	@Override
	public void onBindViewHolder(ViewHolder viewHolder, int position) {

		// - get data from your itemsData at this position
		// - replace the contents of the view with that itemsData

		
		freshWrappImageAdapater td = new freshWrappImageAdapater(viewHolder.mPag.getContext());
		viewHolder.mPag.setAdapter(td);
	

	}

	// Return the size of your dataset (invoked by the layout manager)
	@Override
	public int getItemCount() {
		return mDataset.length;
	}

	// inner class to hold a reference to each item of RecyclerView
	public static class ViewHolder extends RecyclerView.ViewHolder {

		public ViewPager mPag;

		public ViewHolder(View itemLayoutView) {
			super(itemLayoutView);

			mPag = (ViewPager) itemLayoutView.findViewById(R.id.pager1);

		}
	}

}
