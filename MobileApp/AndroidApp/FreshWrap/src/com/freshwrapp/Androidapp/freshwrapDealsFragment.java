package com.freshwrapp.Androidapp;

import java.util.ArrayList;
import java.util.List;

import android.app.Fragment;
import android.graphics.Bitmap;
import android.os.Bundle;
import android.support.v4.view.ViewPager;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.ListView;
import android.widget.Toast;
import freshwrapInterface.f1interface;

public class freshwrapDealsFragment extends Fragment implements f1interface {
	List<Bitmap> xxttt = new ArrayList<Bitmap>();
	View _mView;

	@Override
	public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreateView(inflater, container, savedInstanceState);
		
		_mView = inflater.inflate(R.layout.fragment_one, container, false);
		ViewPager mPag = (ViewPager) _mView.findViewById(R.id.pager);
		freshWrappImageAdapater td = new freshWrappImageAdapater(mPag.getContext());
		mPag.setAdapter(td);

		ListView viewList = (ListView) _mView.findViewById(R.id.listview);

		String[] itemname = { "Safari", "Camera", "Global", "FireFox", "UC Browser", "Android Folder", "VLC Player",
				"Cold War", "Safari", "Camera", "Global" };
		// ImageView mdata = (ImageView) mView.findViewById(R.layout.mylist);
		ArrayAdapter<String> xxx = new ArrayAdapter<String>(_mView.getContext(), R.layout.mylist, R.id.Itemname,
				itemname);
		viewList.setAdapter(xxx);
		return _mView;
	}

	@Override
	public void saveData(List<Bitmap> mm) {

		// TODO Auto-generated method stub
	
		System.out.println("inside save Data");
		xxttt = mm;
	}
}
