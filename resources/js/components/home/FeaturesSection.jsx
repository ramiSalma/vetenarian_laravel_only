import React from 'react';
import icon6 from '../images/icon6.png' ;
import icon7 from '../images/icon7.png' ;
import icon8 from '../images/icon8.png' ;
const features = [
  {
    icon: icon7,
    title: 'Pet Wellness & Grooming',
  },
  {
    icon: icon8,
    title: 'Best Quality Pet accessories',
  },
  {
    icon: icon6,
    title: 'Best affordable Organic Pet Food',
  },
];

const FeaturesSection = () => {
  return (
    <section className="relative bg-purple-950 py-24">
      <div className="absolute top-0 left-1/2 -translate-y-1/2 -translate-x-1/2 flex gap-50 z-20">
        {features.map((feature, idx) => (
          <div
            key={idx}
            className="text-center flex flex-col items-center p-4 rounded-xl shadow-lg bg-purple-300 border-4 border-purple-950 "
          >
            <div className="text-2xl"><img className='w-12' src={feature.icon} alt="" /></div>
            <p className="mt-4 font-semibold w-35 text-purple-950">{feature.title}</p>
          </div>
        ))}
      </div>
    </section>
  );
};

export default FeaturesSection;
