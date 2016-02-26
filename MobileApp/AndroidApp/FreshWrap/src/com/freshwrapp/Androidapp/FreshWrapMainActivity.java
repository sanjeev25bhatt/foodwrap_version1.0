package com.freshwrapp.Androidapp;

import java.util.ArrayList;
import java.util.List;

import com.freshwrapp.constant.freshwrappconst;
import com.freshwrapp.controller.FreshwrapbackendService;
import com.freshwrapp.controller.freshwrappconnectionHandler;

import android.app.Activity;
import android.app.Fragment;
import android.content.Intent;
import android.graphics.Bitmap;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v4.app.ActionBarDrawerToggle;
import android.support.v4.widget.DrawerLayout;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.Toast;
import freshwrapInterface.freshwrapInterface;

public class FreshWrapMainActivity extends Activity implements freshwrapInterface {

	private static final String LOGGING_TAG = "FreshWrapMainActivity";
	public static final String FirstLoader = "freshwrappsplashscreen";
	public static final String SecondLoader = "";

	private List<Bitmap> mlistObject = new ArrayList<Bitmap>();
	freshwrapApplication globalVariable;

	// private ListView _mlistView;
	private DrawerLayout _mdrawerLayout = null;
	private ListView _mlistdrawer;
	private CharSequence _mTitle;
	private CharSequence _mDrawerTitle;
	private ActionBarDrawerToggle _mActionBarDrawerToogle;

	@Override
	protected void onStart() {
		// TODO Auto-generated method stub
		super.onStart();

	}

	@Override

	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		globalVariable = (freshwrapApplication) getApplicationContext();

		// freshwrappSplashscreen mxx = (freshwrappSplashscreen)
		// getFragmentManager().findFragmentById(R.id.splashscreen);

		/*
		 * freshwrapDealsFragment mDeals = (freshwrapDealsFragment)
		 * getFragmentManager() .findFragmentById(R.layout.fragment_one);
		 */

		initDrawer();
	}

	private class DrawerItemClickListener implements ListView.OnItemClickListener {
		@Override
		public void onItemClick(AdapterView parent, View view, int position, long id) {
			selectFragement(position);
		}

	}

	private void selectFragement(int position) {
		Fragment _fragment = null;
		switch (position) {
		case 0: {

			_fragment = new freshwrapDealsFragment();
			break;
		}
		case 1: {
			_fragment = new freshWrapPagerfragment();
		}
		}
		if (_fragment != null) {
			android.app.FragmentTransaction ft = getFragmentManager().beginTransaction(); //
			ft.replace(R.id.frame_container, _fragment).commit();
			_mdrawerLayout.closeDrawer(_mlistdrawer);

		}
	}

	@Override
	public void onAttachFragment(Fragment fragment) {
		// TODO Auto-generated method stub
		super.onAttachFragment(fragment);
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}

	@Override
	public boolean onOptionsItemSelected(MenuItem item) {
		// Handle action bar item clicks here. The action bar will
		// automatically handle clicks on the Home/Up button, so long
		// as you specify a parent activity in AndroidManifest.xml.
		if (_mActionBarDrawerToogle.onOptionsItemSelected(item)) {
			return true;
		}
		int id = item.getItemId();
		switch (id) {

		case R.id.username: {
			FreshWrapAsynTask mFreshWrapAsynTask = new FreshWrapAsynTask();
			mFreshWrapAsynTask.execute(freshwrappconst.IPADDRESS + ":" + freshwrappconst.PORT
					+ freshwrappconst.BLACKSLASH + "HelloWeb/FreshWrappController/json");
			mFreshWrapAsynTask = null;
			break;
		}
		case R.id.shoppingcart: {
			startService(new Intent(getBaseContext(), FreshwrapbackendService.class));
			globalVariable.setContext(this);
			break;
		}
		case R.id.search: {
			Intent myIntent = new Intent(this, FreshWrapcustomView.class);
			startActivity(myIntent);
			break;
		}
		}

		return super.onOptionsItemSelected(item);
	}

	void HandleRequest(int aResult) {
		switch (aResult) {
		case freshwrappconst.TAG_SUCCESS: {
			Toast.makeText(this, "user exists", 1000).show();
			break;
		}
		case freshwrappconst.TAG_FAILURE: {
			Toast.makeText(this, "Failure", 1000).show();
		}
		}
	}

	class FreshWrapAsynTask extends AsyncTask<String, Void, Integer> {

		@Override
		protected Integer doInBackground(String... params) {
			// TODO Auto-generated method stub
			return freshwrappconnectionHandler.processJsonRequest(params[0]);

		}

		@Override
		protected void onPostExecute(Integer result) {
			// TODO Auto-generated method stub
			super.onPostExecute(result);
			HandleRequest(result.intValue());
		}
	}

	@Override
	public void saveImage(List<Bitmap> aList) {
		// TODO Auto-generated method stub
		mlistObject = aList;
		freshwrapDealsFragment mDeals = new freshwrapDealsFragment();
		if (mDeals != null && mDeals.isInLayout())
			mDeals.saveData(aList);
		System.out.println("save image called");
	}

	void initDrawer() {

		_mTitle = _mDrawerTitle = getTitle();

		_mdrawerLayout = (DrawerLayout) findViewById(R.id.drawer_layout);
		_mlistdrawer = (ListView) findViewById(R.id.list_slidermenu);

		String[] itemname = getResources().getStringArray(R.array.drawer_items);

		// ImageView mdata = (ImageView) mView.findViewById(R.layout.mylist);

		ArrayAdapter<String> xxx = new ArrayAdapter<String>(this, R.layout.mylist, R.id.Itemname, itemname);
		_mlistdrawer.setAdapter(xxx);

		getActionBar().setDisplayHomeAsUpEnabled(true);

		_mActionBarDrawerToogle = new ActionBarDrawerToggle(this, _mdrawerLayout, R.drawable.ic_drawer,
				R.string.app_name, R.string.app_name)

		{
			public void onDrawerClosed(android.view.View drawerView) {
				super.onDrawerClosed(drawerView);
				getActionBar().setTitle(_mTitle);
				// invalidateOptionsMenu();
			}

			@Override
			public void onDrawerOpened(View drawerView) {
				// TODO Auto-generated method stub
				super.onDrawerOpened(drawerView);
				getActionBar().setTitle(_mDrawerTitle);
				// invalidateOptionsMenu();
			}
		};
		_mdrawerLayout.setDrawerListener(_mActionBarDrawerToogle);

		// enabling action bar app icon and behaving it as toggle button
		_mlistdrawer.setOnItemClickListener(new DrawerItemClickListener());
	}

}
