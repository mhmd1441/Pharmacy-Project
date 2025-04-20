import 'package:get/get.dart';
import 'package:pharmacies_zone/Controllers/Slide1Controller.dart';
import 'package:pharmacies_zone/Controllers/Slide2Controller.dart';

class Slide2binding extends Bindings{
  @override
  void dependencies() {
    // TODO: implement dependencies
    Get.lazyPut(()=>Slide2controller());
  }


}

