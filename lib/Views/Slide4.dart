import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:pharmacies_zone/Controllers/Slide3Controller.dart';
import 'package:pharmacies_zone/Controllers/Slide4Controller.dart';
import 'package:pharmacies_zone/Routes/AppRoute.dart';



class Slide4 extends GetView<Slide4Controller> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
          backgroundColor: Colors.transparent,
          title: Center( child: Text(""),)
      ),
      body: SingleChildScrollView(
        child: Column(

          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            Stack(
              children: [
                Container(
                  margin: EdgeInsets.only(left:15,right: 15 ),
                  child:
                  Image.asset(
                    'assets/images/img4.PNG',

                  ),
                ),
                Positioned(
                  bottom: 0,
                  child: Container(

                    margin: EdgeInsets.only(left:17,right: 15, ),
                    height: 25,
                    width: 350,
                    decoration:  BoxDecoration(
                      color: Colors.white,
                      borderRadius: BorderRadius.only(
                        topLeft: Radius.circular(30),
                        topRight: Radius.circular(30),
                      ),
                    ),
                  ),
                ),
              ],
            ),
            Container(
              margin: EdgeInsets.only(left:17,right: 15, ),
              padding: EdgeInsets.only(left: 20),
              decoration: BoxDecoration(
                color: Colors.white,
              ),
              width: 350,
              child: Column(crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Text("Hello !",
                        style: TextStyle(
                          fontWeight: FontWeight.bold,

                          fontSize: 35,
                        )

                    ),
                    Text("Register a New Account",
                      style: TextStyle(
                        color: Colors.grey,
                      ),
                    ),
                    SizedBox(height: 10,),
                    Text("Name",
                      style: TextStyle(
                        fontSize: 20,
                      ),
                    ),
                    TextField(
                      decoration: InputDecoration(

                        hintText: "Enter your full name",
                        hintStyle: TextStyle(color: Colors.grey),
                        contentPadding: EdgeInsets.symmetric(horizontal: 16, vertical: 12),
                        border:InputBorder.none,
                        filled: true,
                        fillColor: Colors.grey[200],
                        prefixIcon: Icon(Icons.person,color: Colors.grey,),
                      ),
                    ),
                    SizedBox(height: 10,),
                    Text("Email",
                      style: TextStyle(
                        fontSize: 20,
                      ),
                    ),
                    TextField(
                      decoration: InputDecoration(

                        hintText: "Enter your email",
                        hintStyle: TextStyle(color: Colors.grey),
                        contentPadding: EdgeInsets.symmetric(horizontal: 16, vertical: 12),
                        border:InputBorder.none,
                        filled: true,
                        fillColor: Colors.grey[200],
                        prefixIcon: Icon(Icons.email,color: Colors.grey,),
                      ),
                    ),
                    SizedBox(height: 10,),
                    Text("Password",
                      style: TextStyle(
                        fontSize: 20,
                      ),
                    ),
                    Obx(() => TextField(
                      obscureText: controller.isPasswordHidden.value,
                      decoration: InputDecoration(
                        hintText: "Enter your password",
                        hintStyle: TextStyle(color: Colors.grey),
                        contentPadding: EdgeInsets.symmetric(horizontal: 16, vertical: 12),
                        border: InputBorder.none,
                        filled: true,
                        fillColor: Colors.grey[200],
                        prefixIcon: Icon(Icons.lock, color: Colors.grey),
                        suffixIcon: IconButton(
                          icon: Icon(
                            controller.isPasswordHidden.value
                                ? Icons.visibility_off_outlined
                                : Icons.visibility,
                            color: Colors.grey,
                          ),
                          onPressed: controller.togglePasswordVisibility,
                        ),
                      ),
                    )),

                    SizedBox(height: 10,),
                    Align(
                      alignment: Alignment.centerRight,
                      child: Text("Forgot password?",
                        style: TextStyle(color: Colors.blue,
                          fontSize: 15,
                        ),

                      ),
                    ),
                    SizedBox(height: 15,),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.center,

                      children: [
                        ElevatedButton(
                          onPressed:() { Get.toNamed(AppRoute.slide5); },

                          style: ButtonStyle(
                            minimumSize: MaterialStateProperty.all(Size(300, 50)),
                            backgroundColor: MaterialStateProperty.all(Colors.blue),
                          ),
                          child: Text("Register",
                              style:TextStyle(color: Colors.white,fontSize: 15,)
                          ),

                        ),

                      ],
                    ),
                    SizedBox(height: 30,),
                    Row(

                      children: [
                        Text("You have an account?"),
                        SizedBox(width: 10,),
                        InkWell( onTap: (){Get.toNamed(AppRoute.slide3);}, ),
                        Text("Login",
                          style: TextStyle(
                            color: Colors.blue,

                          ),
                        ),

                      ],
                    ),
                    SizedBox(height: 150,),
                  ]
              ),
            ),
          ],
        ),
      ),
    );
  }
}