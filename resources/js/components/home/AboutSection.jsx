import React from 'react';
import bg7 from '../images/bg7.png';
import bg6 from '../images/bg6.png';
import { FaCheckCircle } from 'react-icons/fa'
const AboutSection = () => {
  return (
    <section className="bg-purple-300 flex h-[600px] flex-col md:flex-row items-center p-10 gap-8">
      <div className="md:w-1/2">
        <img src={bg7} alt="Woman with Dog" className="rounded-2xl w-[800px]" />
      </div>
      <div className="md:w-1/2 relative">
      <img src={bg6} className='absolute top-[-90px] right-[-35px]'/>
        <h4 className='text-purple-500 text-2xl'>About</h4>
        <h2 className="text-7xl font-bold text-purple-950 mb-7">Best Agency For Your Pet.</h2>
        <p className="text-gray-600 mb-4">
          The Pet Wellness Agency brings you services that ensure your animal gets the best care and companionship.
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. At repellat cum, accusamus fugit quod velit recusandae libero error nisi molestias.
        </p>
        <ul className="text-gray-700 flex flex-wrap justify-between space-y-2 w-100">
          <li className='text-purple-950 text-[20px] font-medium flex items-center'><FaCheckCircle/> 20 Years Experience</li>
          <li className='text-purple-950 text-[20px] font-medium flex items-center'> <FaCheckCircle/> Animal Lover</li>
        </ul>
        <ul className="text-gray-700 flex flex-wrap gap-16 space-y-2 ">
          <li className='text-purple-950 text-[20px] font-medium'> Certified Wellness Team</li>
          <li className='text-purple-950 text-[20px] font-medium'> Certified Wellness Team</li>
        </ul>
      </div>
    </section>
  );
};

export default AboutSection;
