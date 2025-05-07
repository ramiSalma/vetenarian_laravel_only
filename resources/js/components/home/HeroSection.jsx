import React from 'react';
import bg1 from '../images/bg1.png';
import bg5 from '../images/bg5.png';
import { Link } from 'react-router-dom';

const HeroSection = () => {
  return (
    <section className="bg-purple-300 text-center h-[600px] pt-28 p-10 relative overflow-hidden">
      {/* Floating bg1 Image on the bottom right */}
      <img
        src={bg1}
        alt="Pet Care"
        className="absolute right-0 bottom-0 w-[700px] object-contain pointer-events-none"
      />

      {/* Circle with bg5 image in top-left with opacity, image bigger than the circle */}
      <div className="absolute top-40 left-40 overflow-visible z-0 flex items-center justify-center">
        <img
          src={bg5}
          alt="Jumping Pet"
          className="w-[200px] -translate-y-10"
        />
      </div>

      {/* Centered Content */}
      <div className="relative z-10 max-w-2xl mx-auto">
        <h1 className="text-7xl text-purple-950 font-bold mb-4">
          We take care your <br /> pets with experts 
        </h1>
        <p className="mb-6 ml-40 w-[400px] text-purple-600">
          Dedicated and loving home care, now from certified pet experts. Your pet’s happiness is our top priority.
        </p>
        <div className="flex justify-center gap-4 mb-6">
        <Link to="/appointment" className="bg-purple-950 text-white px-6 py-3 rounded-[10px]">
          Request an Appointment
        </Link>

        <Link to="/adoption" className="text-purple-950 px-6 py-3 adopt text-xl font-bold">
          Adopt an Animal
        </Link>

        </div>
        {/* <p className="text-lg font-bold">10k+ Happy Customers</p> */}
      </div>
    </section>
  );
};

export default HeroSection;
