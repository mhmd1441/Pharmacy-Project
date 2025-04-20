import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:pharmacies_zone/Controllers/Slide1Controller.dart';
import 'package:pharmacies_zone/Routes/AppRoute.dart';



class Slide1 extends GetView<Slide1Controller> {
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
              width: 300,
              height: 200,
            ),
            SizedBox(height:5,),

            Text(
              'Welcome To',
              style: TextStyle(
                color: Colors.grey,
                fontSize: 20,
              ),
            ),
            Text(''), // Empty text widget for spacing

            Text(
              'Pharmacy Zone',
              style: TextStyle(
                fontSize: 35,
                fontWeight: FontWeight.bold,
                color: Colors.blue, // Correct usage of Colors.blue
              ),
            ),
            Text(''), // Empty text widget for spacing

            Text(
              'Your trusted online',
              style: TextStyle(
                color: Colors.grey,
                fontSize: 20,
              ),
            ),
            Text(
              'Pharmacy, just a tap way',
              style: TextStyle(
                color: Colors.grey,
                fontSize: 20,

              ),
            ),
            SizedBox(height: 65), // Empty text widget for spacing

            ElevatedButton(
              onPressed: () { Get.toNamed(AppRoute.slide2);},
              style: ElevatedButton.styleFrom(
                backgroundColor: Colors.blue,

              ),
              child: Row(
                mainAxisSize: MainAxisSize.min, // Prevents unnecessary stretching
                children: [
                  SizedBox(width: 60,),
                  Text('Next      ',
                    style: TextStyle(color: Colors.white,
                      fontSize: 25,

                    ),

                  ),
                  SizedBox(width: 30,height: 60,), // Adds spacing between text and icon
                  Icon(Icons.arrow_forward, color: Colors.white),


                ],
              ),
            ),

          ],
        ),
      ),
    );
  }
}