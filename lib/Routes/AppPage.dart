import 'package:get/get.dart';
import 'package:pharmacies_zone/Bindings/Slide1Binding.dart';
import 'package:pharmacies_zone/Bindings/Slide2Binding.dart';
import 'package:pharmacies_zone/Bindings/Slide3Binding.dart';
import 'package:pharmacies_zone/Bindings/Slide4Binding.dart';
import 'package:pharmacies_zone/Bindings/Slide5Binding.dart';
import 'package:pharmacies_zone/Routes/AppRoute.dart';
import 'package:pharmacies_zone/Views/Slide1.dart';
import 'package:pharmacies_zone/Views/Slide2.dart';
import 'package:pharmacies_zone/Views/Slide3.dart';
import 'package:pharmacies_zone/Views/Slide4.dart';
import 'package:pharmacies_zone/Views/Slide5.dart';

class AppPage{
  static final List <GetPage> pages = [
    GetPage(name: AppRoute.slide1, page: ()=> Slide1(), binding: Slide1Binding()),
    GetPage(name: AppRoute.slide2, page: ()=> Slide2(), binding: Slide2binding()),
    GetPage(name: AppRoute.slide3, page: ()=> Slide3(),  binding: Slide3Binding()),
    GetPage(name: AppRoute.slide4, page: ()=> Slide4(),  binding: Slide4Binding()),
    GetPage(name: AppRoute.slide5, page: ()=> Slide5(),  binding: Slide5Binding()),
  ];



}