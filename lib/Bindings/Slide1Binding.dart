import 'package:get/get.dart';
import 'package:pharmacies_zone/Controllers/Slide1Controller.dart';

class Slide1Binding extends Bindings{
  @override
  void dependencies() {
    // TODO: implement dependencies
    Get.lazyPut(()=>Slide1Controller());
  }


}

