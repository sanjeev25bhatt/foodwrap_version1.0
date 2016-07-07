package com.version_first.blackpearl.softnerveui;

import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.graphics.Color;
import android.support.design.widget.CollapsingToolbarLayout;
import android.support.v4.app.NavUtils;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.graphics.Palette;
import android.support.v7.widget.Toolbar;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import java.util.ArrayList;
import java.util.LinkedHashMap;
import java.util.List;

public class SalesActivity extends AppCompatActivity {
    private CollapsingToolbarLayout collapsingToolbarLayout = null;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.collapsing_toolbar);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        ImageView collapsing_img = (ImageView) findViewById(R.id.collapsing_img);
        LinearLayout inflating_careers = (LinearLayout) findViewById(R.id.inflating_careers);
        collapsing_img.setBackgroundResource(R.drawable.ux_design);
        setSupportActionBar(toolbar);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);

        collapsingToolbarLayout = (CollapsingToolbarLayout) findViewById(R.id.collapsing_toolbar);
        collapsingToolbarLayout.setTitle("Business Development");
        dynamicToolbarColor();
        toolbarTextAppearance();

        LayoutInflater inflate_layout = getLayoutInflater();
        View view = inflate_layout.inflate(R.layout.job_description, inflating_careers, false);
        inflating_careers.addView(view);

        JobDataProvider CareerData = new JobDataProvider();
        LinkedHashMap<String, List<String>> jobContent = new LinkedHashMap<String, List<String>>();
        jobContent = CareerData.getInfo("Business Development");
        List<String> CareerFields = new ArrayList<String>(jobContent.keySet());
        String experience = jobContent.get(CareerFields.get(0)).get(0);
        String qualification = jobContent.get(CareerFields.get(1)).get(0);
        String job_location = jobContent.get(CareerFields.get(2)).get(0);


        TextView experience_yr = (TextView) view.findViewById(R.id.experience_yr);
        experience_yr.setText(experience);
        TextView qualification_what = (TextView) view.findViewById(R.id.qualification_what);
        qualification_what.setText(qualification);
        TextView job_location_area = (TextView) view.findViewById(R.id.job_location_area);
        job_location_area.setText(job_location);
        LinearLayout inflating_deliverable = (LinearLayout) view.findViewById(R.id.inflate_deliverable_content);

        int length = jobContent.get(CareerFields.get(3)).size();

        for(int i=0; i<length; i++)
        {
            View deliverable = inflate_layout.inflate(R.layout.deliverable_content, inflating_deliverable, false);
            inflating_deliverable.addView(deliverable);
            TextView content = (TextView) deliverable.findViewById(R.id.glyph30_content);
            String string = jobContent.get(CareerFields.get(3)).get(i);
            content.setText(string);
        }
    }

    private void toolbarTextAppearance() {
        collapsingToolbarLayout.setCollapsedTitleTextAppearance(R.style.collapsedappbar);
        collapsingToolbarLayout.setExpandedTitleTextAppearance(R.style.expandedappbar);
    }

    private void dynamicToolbarColor() {
        Bitmap bitmap = BitmapFactory.decodeResource(getResources(), R.drawable.ux_design);
        Palette.from(bitmap).generate(new Palette.PaletteAsyncListener() {
            @Override
            public void onGenerated(Palette palette) {
                collapsingToolbarLayout.setContentScrimColor(palette.getMutedColor(Color.parseColor("#3F51B5")));
                collapsingToolbarLayout.setStatusBarScrimColor(palette.getMutedColor(Color.parseColor("#303F9F")));
            }
        });
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {

        }

        if(id == android.R.id.home) {
            NavUtils.navigateUpFromSameTask(this);
        }
        return super.onOptionsItemSelected(item);
    }
}
