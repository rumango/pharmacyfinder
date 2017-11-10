package com.example.elaine.locator;
import android.content.Context;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.Toast;

public class getResult extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_get_result);

        Bundle extras = getIntent().getExtras();
        double latitude = extras.getDouble("latitude");
        double longitude = extras.getDouble("longitude");
        String drugName = extras.getString("drugName");
        System.out.println("+++++++++++++++++++++++++++++");
        System.out.println(longitude);
        System.out.println("\n");
        System.out.println(latitude);
        System.out.println("\n");
        System.out.println(drugName);




    }
}
