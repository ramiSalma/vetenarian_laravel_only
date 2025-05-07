import React from "react";
import doctorDog from '../images/doctorDog.png';
import { Link } from "react-router-dom";

export default function PetDoctorBenefits() {
  return (
    <section
      className="bg-white py-10  px-4 md:px-8 lg:px-16 relative"
      style={{
        // backgroundImage: `url('https://media.istockphoto.com/id/1457493367/vector/pet-paw-seamless-pattern-vector-illustration-with-cat-or-dog-paw-on-purple-background.jpg?s=612x612&w=0&k=20&c=K8z84mTmt5chOaJDHvYe3_UF7eXj1ESxsz1Yxg3MCpI=')`,
        // backgroundRepeat: 'repeat',
        
        // opacity: 0.5,
        
      }}
    >
      <div className="max-w-5xl mx-auto text-center">
        <h2 className="text-3xl md:text-4xl font-bold mb-4 text-purple-950">Veterinary Services</h2>
        <p className="text-gray-500 text-purple-500 max-w-xl mx-auto mb-12">
        Because of the shorter lifespan of our pets, we stress annual physical examinations for every animal. Thorough check-ups and preventive care can help alleviate serious health problems. We offer a wide range of veterinary services to keep your companions feeling their best.
        </p>

        <div className="relative w-full flex justify-center items-center">
          <div className="relative w-[200px] h-[200px] sm:w-[340px] sm:h-[340px] md:w-[380px] md:h-[380px]">
            <div className="absolute roundedBlop inset-0 bg-purple-300 rounded-full z-0"></div>
            <img
              src={doctorDog}
              alt="Dog with pencil"
              className="absolute -top-2 scale-x-[2] scale-y-[2] left-1/2 transform -translate-x-1/2 w-[500px] sm:w-[600px] md:w-[700px] z-10"
            />

            {/* Feature 1 */}
            <div className="absolute -left-64 top-1/4 flex items-center text-left">
              <div>
                <h4 className="font-semibold text-right text-purple-950">
                Pet Bathing</h4>
                <p className="text-sm text-gray-500 max-w-[220px] text-right">
                we offer comprehensive pet bathing services to keep your pet clean, comfortable, and healthy.
                </p>
              </div>
              <div className="w-12 h-12 rounded-full bg-yellow-200 flex items-center justify-center ml-2">🐶</div>
            </div>

            {/* Feature 2 */}
            <div className="absolute -right-64 top-1/4 flex items-center text-right">
              <div className="w-[60px] h-[60px] mr-3 rounded-full bg-pink-200 flex items-center justify-center">👨‍⚕️</div>
              <div>
                <h4 className="font-semibold text-left text-purple-950">Pet Behavioral Counseling</h4>
                <p className="text-sm text-gray-500 max-w-[220px] text-left">
                we offer comprehensive pet behavioral counseling to help address these challenges.
                </p>
              </div>
            </div>

            {/* Feature 3 */}
            <div className="absolute -left-62 bottom-12 z-20 flex items-center text-left">
              <div>
                <h4 className="font-semibold text-right text-purple-950">Pet Boarding</h4>
                <p className="text-sm text-gray-500 max-w-[220px] text-right">
                we offer comprehensive boarding services for a safe, comfortable, and engaging environment for your pets while you’re away.
                </p>
              </div>
              <div className="w-[60px] h-[60px] ml-3 rounded-full bg-yellow-200 flex items-center justify-center">🐱</div>
            </div>

            {/* Feature 4 */}
            <div className="absolute -right-66 bottom-13 flex items-center text-right z-15">
              <div className="w-[60px] h-[60px] mr-3 rounded-full bg-orange-200 flex items-center justify-center">💊</div>
              <div>
                <h4 className="font-semibold text-left text-purple-950">
                Pet Dentistry</h4>
                <p className="text-sm text-gray-500 max-w-[220px] text-left">
                our comprehensive pet dentistry services maintain your pet’s oral health at the highest standard.
                </p>
              </div>
            </div>
          </div>
        </div>

        <div className="mt-20">
          <Link to="/appointment" className="px-6  py-3 mb-[10px] -mt-30 bg-purple-950 hover:bg-purple-600 text-white rounded-full text-sm font-semibold shadow-md transition">
          Request an Appointment
          </Link>
        </div>
      </div>
      {/* <img className="absolute  left-120 -bottom-20 w-[600px] mt-40" src="https://t4.ftcdn.net/jpg/03/07/28/29/240_F_307282946_dbctSHdtrRtWYHoHkUC53JkWkkhm2zJW.jpg" alt="" /> */}
    </section>
  );
}
