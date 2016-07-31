package com.softnerveDataModel;

import java.util.ArrayList;
import java.util.List;

public class SoftnerverSpecialities {

	private String _specialitiesType = null;
	private String _specialitiesDetails = null;
	
	
	private List<Object> consultingDoctors = new  ArrayList<Object> () ;;

	
	public void setSpecialitestype(String aSpecialitiesType) {
		this._specialitiesType = aSpecialitiesType;
	}

	public void setSpecialitiesDetails(String aSpecialitiesDetails) {
		this._specialitiesDetails = aSpecialitiesDetails;
	}

	public void setConsultingDoctor(Object localDocObj) {
		this.consultingDoctors.add(localDocObj);
	}

	public String getsetSpecialitestype() {
		return _specialitiesType;
	}

	public String getspecialitiesDetails() {
		return _specialitiesDetails;
	}

	public List<Object> getConsultingDoctors() {
		return consultingDoctors;
	}
}
