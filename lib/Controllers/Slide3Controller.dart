import 'package:flutter/cupertino.dart';
import 'package:get/get.dart';

class Slide3Controller extends GetxController{
  TextEditingController email =TextEditingController();
  TextEditingController password =TextEditingController();

  var isPasswordHidden = true.obs;

  void togglePasswordVisibility() {
    isPasswordHidden.value = !isPasswordHidden.value;
  }
}