package com.softnervecare;

import org.springframework.stereotype.Component;

@Component("myBean")
public class softnerveBackendService {

	
	public softnerveBackendService() {
		// TODO Auto-generated constructor stub
	}
	    public void executePeriodically() {
	        System.out.println("-->>>>Periodic checkk ---> ");
	    }
}
