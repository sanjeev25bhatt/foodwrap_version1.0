package com.version_first.blackpearl.softnerveui;
import android.content.Context;
import android.support.v4.view.PagerAdapter;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.TextView;

/**
 * Created by Black Pearl on 6/23/2016.
 */
public class IntroCarouselAdapter extends PagerAdapter {

    private int[] imageResources;
    private Context context;
    ViewGroup container;
    private LayoutInflater layoutInflater;

    public IntroCarouselAdapter(Context context, int[] imageResources) {
        this.context = context;
        this.imageResources = imageResources;
    }


    @Override
    public int getCount() {
        return imageResources.length;
    }

    @Override
    public boolean isViewFromObject(View view, Object object) {
        return (view == (RelativeLayout)object);
    }

    @Override
    public Object instantiateItem(ViewGroup container, int position) {
        this.container = container;
        layoutInflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
        View view = layoutInflater.inflate(R.layout.swipe_layout, container, false);
        ImageView imageView = (ImageView) view.findViewById(R.id.intro_carousel_imgview);
        imageView.setImageResource(imageResources[position]);
        container.addView(view);
        return view;
    }

    @Override
    public void destroyItem(ViewGroup container, int position, Object object) {
        container.removeView((RelativeLayout) object);
    }

}
