import 'package:flutter/cupertino.dart';
import 'package:get/get.dart';

class Slide4Controller extends GetxController{
  TextEditingController email =TextEditingController();
  TextEditingController password =TextEditingController();
  TextEditingController name =TextEditingController();


  var isPasswordHidden = true.obs;

  void togglePasswordVisibility() {
  isPasswordHidden.value = !isPasswordHidden.value;
  }
}


