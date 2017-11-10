package com.example.elaine.locator;

import android.Manifest;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.location.Location;
import android.location.LocationManager;
import android.os.Build;
import android.os.Parcelable;
import android.support.annotation.NonNull;
import android.support.v4.app.ActivityCompat;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.AutoCompleteTextView;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import static android.Manifest.permission.ACCESS_FINE_LOCATION;
import static com.example.elaine.locator.R.styleable.View;

public class MainActivity extends AppCompatActivity {
    static final int REQUEST_LOCATION = 1;
    LocationManager locationManager;
    private AutoCompleteTextView medicine;
    private static final int PERMISSION_REQUEST_CODE=200;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        medicine = (AutoCompleteTextView) findViewById(R.id.drugNames);
        // Get the string array
        String[] drugs = getResources().getStringArray(R.array.drugNames);
        // Create the adapter and set it to the AutoCompleteTextView
        ArrayAdapter<String> adapter =
                new ArrayAdapter<String>(this, android.R.layout.simple_list_item_1, drugs);
        medicine.setAdapter(adapter);
        locationManager = (LocationManager)getSystemService(Context.LOCATION_SERVICE);

    }


    private void dialogPopup(String message, DialogInterface.OnClickListener okListener){
        new AlertDialog.Builder(MainActivity.this).setMessage(message).setPositiveButton("OK",okListener).create().show();


    }

    public void getDrug(android.view.View arg0) {
        if(ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION)
                != PackageManager.PERMISSION_GRANTED && ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_COARSE_LOCATION)
                != PackageManager.PERMISSION_GRANTED) {

            ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.ACCESS_FINE_LOCATION}, REQUEST_LOCATION);

        }
        else {
            Location location = locationManager.getLastKnownLocation(LocationManager.NETWORK_PROVIDER);

            if (location != null){
                double latti = location.getLatitude();
                double longi = location.getLongitude();
                System.out.println("+++++++++++++++++++++++++++++++++++++");
                medicine.getText();
                System.out.println(medicine);



                Intent i = new Intent(MainActivity.this, getResult.class);
                i.putExtra("drugName", medicine.toString());
                i.putExtra("latitude", location.getLatitude());
                i.putExtra("longitude", location.getLongitude());
                startActivity(i);

            } else {

                dialogPopup("Allow access to your location",new DialogInterface.OnClickListener(){
                    @Override
                    public  void onClick(DialogInterface dialog,int which){
                        if (Build.VERSION.SDK_INT>=Build.VERSION_CODES.M){

//                            requestPermissions(new String[]{ACCESS_FINE_LOCATION},PERMISSION_REQUEST_CODE);
                        }
                    }
                });


            }
        }



    }


}

