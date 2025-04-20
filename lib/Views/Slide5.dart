import 'package:flutter/material.dart';
import 'package:get/get.dart';
import 'package:pharmacies_zone/Controllers/Slide5Controller.dart';

class Slide5 extends StatefulWidget {
  @override
  _Slide5State createState() => _Slide5State();
}

class _Slide5State extends State<Slide5> {
  // Variable to track if the button is clicked
  bool _isClicked = false;

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        backgroundColor: Colors.transparent,
        title: Center(child: Text("")),
      ),
      body: SingleChildScrollView(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.start,
          children: <Widget>[
            // Search bar
            Container(
              width: 330,
              margin: EdgeInsets.only(bottom: 20),
              child: TextField(
                decoration: InputDecoration(
                  hintText: "Search Medicines ...",
                  hintStyle: TextStyle(color: Colors.grey),
                  contentPadding:
                  EdgeInsets.symmetric(horizontal: 16, vertical: 12),
                  border: InputBorder.none,
                  filled: true,
                  fillColor: Colors.grey[200],
                  prefixIcon: Icon(Icons.search, color: Colors.grey),
                ),
              ),
            ),

            // "Medicines" title row
            Padding(
              padding: EdgeInsets.only(left: 30, bottom: 20),
              child: Row(
                children: [
                  Text(
                    'Medicines',
                    style: TextStyle(
                      fontWeight: FontWeight.bold,
                      fontSize: 20,
                    ),
                  ),
                  Spacer(),
                  TextButton(
                    onPressed: () {},
                    child: Text(
                      'See all',
                      style: TextStyle(color: Colors.grey),
                    ),
                  ),
                  Icon(
                    Icons.arrow_forward,
                    size: 20,
                    color: Colors.grey,
                  ),
                ],
              ),
            ),

            // Image cards
            Padding(
              padding: EdgeInsets.only(left: 30, bottom: 20),
              child: Row(
                children: [
                  // Calcium Image with text
                  ClipRRect(
                    borderRadius: BorderRadius.circular(20),
                    child: Stack(
                      alignment: Alignment.bottomCenter,
                      children: [
                        Image.asset(
                          'assets/images/calcium.PNG',
                          width: 100,
                          height: 100,
                          fit: BoxFit.cover,
                        ),
                        Container(
                          width: 100,
                          color: Colors.blue.withOpacity(0.6),
                          padding: EdgeInsets.symmetric(vertical: 4),
                          child: Center(
                            child: Text(
                              'Calcium',
                              style: TextStyle(
                                color: Colors.white,
                                fontWeight: FontWeight.bold,
                              ),
                            ),
                          ),
                        ),
                      ],
                    ),
                  ),
                  SizedBox(width: 20),

                  // Fish Oil Image with text
                  ClipRRect(
                    borderRadius: BorderRadius.circular(20),
                    child: Stack(
                      alignment: Alignment.bottomCenter,
                      children: [
                        Image.asset(
                          'assets/images/fish_oil.PNG',
                          width: 100,
                          height: 100,
                          fit: BoxFit.cover,
                        ),
                        Container(
                          width: 100,
                          color: Colors.blue.withOpacity(0.6),
                          padding: EdgeInsets.symmetric(vertical: 4),
                          child: Center(
                            child: Text(
                              'Fish Oil',
                              style: TextStyle(
                                color: Colors.white,
                                fontWeight: FontWeight.bold,
                              ),
                            ),
                          ),
                        ),
                      ],
                    ),
                  ),
                  SizedBox(width: 20),

                  // Vitamin Image with text
                  ClipRRect(
                    borderRadius: BorderRadius.circular(20),
                    child: Stack(
                      alignment: Alignment.bottomCenter,
                      children: [
                        Image.asset(
                          'assets/images/vitamine.PNG',
                          width: 100,
                          height: 100,
                          fit: BoxFit.cover,
                        ),
                        Container(
                          width: 100,
                          color: Colors.blue.withOpacity(0.6),
                          padding: EdgeInsets.symmetric(vertical: 4),
                          child: Center(
                            child: Text(
                              'Vitamine',
                              style: TextStyle(
                                color: Colors.white,
                                fontWeight: FontWeight.bold,
                              ),
                            ),
                          ),
                        ),
                      ],
                    ),
                  ),
                ],
              ),
            ),

            // Best Sales Button with dynamic background change on click
            Padding(
              padding: EdgeInsets.only(left: 30, bottom: 10),
              child: Row(
                children: [
                  // Best Sales Button
                  TextButton(
                    style: TextButton.styleFrom(
                      backgroundColor: _isClicked
                          ? Colors.grey[300]
                          : Colors.transparent, // Grey when clicked
                      shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(20),
                      ),
                    ),
                    onPressed: () {
                      setState(() {
                        _isClicked = !_isClicked; // Toggle the state of button
                      });
                    },
                    child: Text(
                      'Best Sales',
                      style: TextStyle(
                        color: Colors.blue,
                        fontWeight: FontWeight.bold,
                      ),
                    ),
                  ),
                  SizedBox(width: 20),
                  // Pharmacies Button
                  TextButton(
                    style: TextButton.styleFrom(
                      backgroundColor: _isClicked
                          ? Colors.grey[300]
                          : Colors.transparent, // Grey when clicked
                      shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(20),
                      ),
                    ),
                    onPressed: () {
                      setState(() {
                        _isClicked = !_isClicked;
                      });
                    },
                    child: Text(
                      'Pharmacies',
                      style: TextStyle(
                        color: Colors.blue,
                        fontWeight: FontWeight.bold,
                      ),
                    ),
                  ),
                  SizedBox(width: 20),
                  // Popular Button
                  TextButton(
                    style: TextButton.styleFrom(
                      backgroundColor: _isClicked
                          ? Colors.grey[300]
                          : Colors.transparent, // Grey when clicked
                      shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(20),
                      ),
                    ),
                    onPressed: () {
                      setState(() {
                        _isClicked = !_isClicked;
                      });
                    },
                    child: Text(
                      'Popular',
                      style: TextStyle(
                        color: Colors.blue,
                        fontWeight: FontWeight.bold,
                      ),
                    ),
                  ),
                ],
              ),
            ),

            // Row with image, text, and location icon
            Padding(
              padding: EdgeInsets.symmetric(horizontal: 20, vertical: 10),
              child: Container(
                decoration: BoxDecoration(
                  color: Colors.white,
                  borderRadius: BorderRadius.circular(15),
                  boxShadow: [
                    BoxShadow(
                      color: Colors.black12,
                      blurRadius: 6,
                      offset: Offset(0, 3),
                    ),
                  ],
                ),
                padding: EdgeInsets.all(10),
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    // Image
                    ClipRRect(
                      borderRadius: BorderRadius.circular(8),
                      child: Image.asset(
                        'assets/images/aspirine.PNG',
                        width: 60,
                        height: 60,
                        fit: BoxFit.cover,
                      ),
                    ),

                    SizedBox(width: 10),

                    // Column with medicine info
                    Expanded(
                      child: Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          Text(
                            'Aspirine',
                            style: TextStyle(
                              fontWeight: FontWeight.bold,
                              fontSize: 16,
                            ),
                          ),
                          SizedBox(height: 4),
                          Row(
                            children: [
                              Text(
                                'Jinan Pharmacy',
                                style: TextStyle(color: Colors.grey[700]),
                              ),
                              SizedBox(width: 4),
                              Icon(Icons.location_on, size: 16, color: Colors.blue),
                            ],
                          ),
                        ],
                      ),
                    ),

                    // Column with plus icon and price
                    Column(
                      children: [
                        Icon(Icons.add_circle, color: Colors.blue),
                        SizedBox(height: 4),
                        Text(
                          '\$6.12',
                          style: TextStyle(fontWeight: FontWeight.bold),
                        ),
                      ],
                    ),
                  ],
                ),
              ),
            ),
            Padding(
              padding: EdgeInsets.symmetric(horizontal: 20, vertical: 10),
              child: Container(
                decoration: BoxDecoration(
                  color: Colors.white,
                  borderRadius: BorderRadius.circular(15),
                  boxShadow: [
                    BoxShadow(
                      color: Colors.black12,
                      blurRadius: 6,
                      offset: Offset(0, 3),
                    ),
                  ],
                ),
                padding: EdgeInsets.all(10),
                child: Row(

                  children: [
                    // Image
                    ClipRRect(
                      borderRadius: BorderRadius.circular(8),
                      child: Image.asset(
                        'assets/images/Otrivine.PNG',
                        width: 60,
                        height: 60,
                        fit: BoxFit.cover,
                      ),
                    ),

                    SizedBox(width: 10),

                    // Column with medicine info
                    Expanded(
                      child: Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          Text(
                            'Otrivine',
                            style: TextStyle(
                              fontWeight: FontWeight.bold,
                              fontSize: 16,
                            ),
                          ),
                          SizedBox(height: 4),
                          Row(
                            children: [
                              Text(
                                'Hady Pharmacy',
                                style: TextStyle(color: Colors.grey[700]),
                              ),
                              SizedBox(width: 4),
                              Icon(Icons.location_on, size: 16, color: Colors.blue),
                            ],
                          ),
                        ],
                      ),
                    ),

                    // Column with plus icon and price
                    Column(
                      children: [
                        Icon(Icons.add_circle, color: Colors.blue),
                        SizedBox(height: 4),
                        Text(
                          '\$6.12',
                          style: TextStyle(fontWeight: FontWeight.bold),
                        ),
                      ],
                    ),
                  ],
                ),
              ),
            ),
            Padding(
              padding: EdgeInsets.symmetric(horizontal: 20, vertical: 10),
              child: Container(
                decoration: BoxDecoration(
                  color: Colors.white,
                  borderRadius: BorderRadius.circular(15),
                  boxShadow: [
                    BoxShadow(
                      color: Colors.black12,
                      blurRadius: 6,
                      offset: Offset(0, 3),
                    ),
                  ],
                ),
                padding: EdgeInsets.all(10),
                child: Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    // Image
                    ClipRRect(
                      borderRadius: BorderRadius.circular(8),
                      child: Image.asset(
                        'assets/images/NoiseSpiring.PNG',
                        width: 60,
                        height: 60,
                        fit: BoxFit.cover,
                      ),
                    ),

                    SizedBox(width: 10),

                    // Column with medicine info
                    Expanded(
                      child: Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          Text(
                            'Noise Spiring',
                            style: TextStyle(
                              fontWeight: FontWeight.bold,
                              fontSize: 16,
                            ),
                          ),
                          SizedBox(height: 4),
                          Row(
                            children: [
                              Text(
                                'Jhon Pharmacy',
                                style: TextStyle(color: Colors.grey[700]),
                              ),
                              SizedBox(width: 4),
                              Icon(Icons.location_on, size: 16, color: Colors.blue),
                            ],
                          ),
                        ],
                      ),
                    ),

                    // Column with plus icon and price
                    Column(
                      children: [
                        Icon(Icons.add_circle, color: Colors.blue),
                        SizedBox(height: 4),
                        Text(
                          '\$6.12',
                          style: TextStyle(fontWeight: FontWeight.bold),
                        ),
                      ],
                    ),
                  ],
                ),
              ),
            ),
          ],
        ),
      ),
    );
  }
}