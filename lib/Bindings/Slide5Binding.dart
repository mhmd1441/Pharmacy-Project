import 'package:get/get.dart';
import 'package:pharmacies_zone/Controllers/Slide4Controller.dart';
import 'package:pharmacies_zone/Controllers/Slide5Controller.dart';

class Slide5Binding extends Bindings{
  @override
  void dependencies() {
    // TODO: implement dependencies
    Get.lazyPut(()=>Slide5Controller());
  }


}