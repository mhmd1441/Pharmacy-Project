import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:get/get_navigation/src/routes/default_transitions.dart';
import 'package:pharmacies_zone/Controllers/Slide1Controller.dart';
import 'package:pharmacies_zone/Controllers/Slide2Controller.dart';
import 'package:pharmacies_zone/Routes/AppRoute.dart';



class Slide2 extends GetView<Slide2controller> {
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor:Colors.white,
      appBar: AppBar(
        automaticallyImplyLeading: false,

        title: Center(

        ),
      ),



      body: Center(

        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[

            Image.asset('assets/images/img.jpeg',
              width: 250,
              height: 150,
            ),
            SizedBox(height:5,),


            Text(
              '"Discover Medicines &',
              style: TextStyle(
                fontSize: 25,


              ),
            ),
            // Empty text widget for spacing

            Text(
              'Wellness"',
              style: TextStyle(

                fontSize: 25,
              ),
            ),

            SizedBox(height: 30), // Empty text widget for spacing

            ElevatedButton(
              onPressed: () { Get.toNamed(AppRoute.slide3); },
              style: ElevatedButton.styleFrom(
                backgroundColor: Colors.blue,

              ),
              child: Row(
                mainAxisSize: MainAxisSize.min, // Prevents unnecessary stretching
                children: [
                  SizedBox(width: 20,),
                  Text('     Get Started      ',
                    style: TextStyle(color: Colors.white,
                      fontSize: 20,

                    ),

                  ),
                  SizedBox(width: 10,height: 60,), // Adds spacing between text and icon
                  Icon(Icons.arrow_forward, color: Colors.white, size: 25,),


                ],

              ),
            ),
        Padding(padding: EdgeInsets.only(right:90,),
          child:
            Image.asset('assets/images/1.PNG',
              width: 400,
                 height: 300,
               ),
        ),



          ],
        ),
      ),
    );
  }
}