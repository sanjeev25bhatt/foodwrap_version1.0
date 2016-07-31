package com.softnerveDataModel;


public class SoftnerveDoctorList {

	private String mAddress = null;
	private String mImageName;
	private String mName = null;
	private String mDegree = null;
	private String mSpecialization = null;
	private String mPreviousRecord = null;
	private String mExperience = null;
	private String mPhoneNumber = null;
	
	public String getmPreviousRecord() {
		return mPreviousRecord;
	}

	public String getmPhoneNumber() {
		return mPhoneNumber;
	}

	public void setmPhoneNumber(String mPhoneNumber) {
		this.mPhoneNumber = mPhoneNumber;
	}

	public void setmPreviousRecord(String mPreviousRecord) {
		this.mPreviousRecord = mPreviousRecord;
	}

	public String getmExperience() {
		return mExperience;
	}

	public void setmExperience(String mExperience) {
		this.mExperience = mExperience;
	}

	public SoftnerveDoctorList() {
	}
	
	public String getmName() {
		return mName;
	}

	public void setmName(String mName) {
		this.mName = mName;
	}

	public String getmDegree() {
		return mDegree;
	}

	public void setmDegree(String mDegree) {
		this.mDegree = mDegree;
	}

	public String getmSpecialization() {
		return mSpecialization;
	}

	public void setmSpecialization(String mSpecialization) {
		this.mSpecialization = mSpecialization;
	}

	public void setAddress(String aAddress) {
		mAddress = aAddress;
	}

	public String getAddress() {
		return mAddress;
	}

	public String getImage() {
		mImageName = "images.jpg";
		return mImageName;
	}

}
