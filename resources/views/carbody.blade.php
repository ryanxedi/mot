                <div>
                    Make: {{ make }}<br>
                    Model: {{ model }}<br>
                    Colour: {{ primaryColour }}
                    Fuel: {{ fuelType }}
                </div>

                <h2>MOT History</h2>

                @foreach motTests as motTest
                <div>
                    Test Result: {{ testResult }}
                    Date: {{ completedDate }}
                    Mileage {{ odometerValue}} {{ odometerUnit }}
                    Test Number: {{ motTestNumber }}
                </div>
                @endforeach
            </div>