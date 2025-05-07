import React from "react";
import icon2 from '../images/icon2.png';
import { FaPhone, FaEnvelope, FaMapMarkerAlt , FaCheckCircle } from 'react-icons/fa';
import footerImg from '../images/footerImg.png';
const Footer = () => {
  return (
    <footer className="bg-purple-950 text-white px-5 py-8 font-sans border-t border-gray-200">
      <div className="flex flex-col items-center text-center">

        {/* Logo & Title */}
        <div className="mb-8">
          <h3 className="font-bold text-4xl mb-4  flex items-center gap-2">
            <img src={icon2} alt="logo" className="w-[35px]" />
            dogtober
          </h3>

          {/* Navigation Links with border-right */}
          <div className="flex flex-wrap justify-center gap-y-2">
            {["Home", "About Us", "Services", "How to use", "Benefit", "Blog", "Contact Us"].map((item, index, array) => (
              <a
                key={item}
                href="#"
                className={`text-sm hover:underline px-3 ${
                  index !== array.length - 1 ? "border-r border-white" : ""
                }`}
              >
                {item}
              </a>
            ))}
          </div>
        </div>

        {/* Contact Information */}
        <div className="mb-8 flex flex-col sm:flex-row gap-8 sm:gap-20 items-center">
          
          {/* Address */}
          <div className="flex items-center justify-center w-72 p-4 rounded ">
            <div className="w-16 h-16 mr-4 rounded-full bg-purple-300 flex items-center justify-center text-purple-900 text-xl skew-y-12">
              <FaMapMarkerAlt />
            </div>
            <div className="text-left">
              <h4 className="font-bold text-sm mb-1">Address</h4>
              <p className="text-sm">2020 Guide III<br />Myriad Books, SC 29077</p>
            </div>
          </div>

          {/* Phone */}
          <div className="flex items-center justify-center w-72 p-4 rounded ">
            <div className="w-16 h-16 mr-4 rounded-full bg-purple-300 flex items-center justify-center text-purple-900 text-xl skew-y-12">
              <FaPhone />
            </div>
            <div className="text-left">
              <h4 className="font-bold text-sm mb-1">Phone</h4>
              <p className="text-sm">+03 327 456 789<br />+09 487 646 212</p>
            </div>
          </div>

          {/* Email */}
          <div className="flex items-center justify-center w-72 p-4 rounded ">
            <div className="w-16 h-16 mr-4 rounded-full bg-purple-300 flex items-center justify-center text-purple-900 text-xl skew-y-12">
              <FaEnvelope />
            </div>
            <div className="text-left">
              <h4 className="font-bold text-sm mb-1">Email</h4>
              <p className="text-sm">Ewapooshinter@gmail.com</p>
            </div>
          </div>
        </div>

        {/* Copyright */}
        <div className="text-xs ">
          Copyright © 2020 The Pine Adviser. All rights reserved.
          <img src={footerImg} className=" w-[700px]"  alt="" />
        </div>
      </div>
    </footer>
  );
};

export default Footer;
