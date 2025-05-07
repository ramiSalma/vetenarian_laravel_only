import React, { useEffect, useState } from 'react';
import { Link, Outlet } from 'react-router-dom';
import icon1 from '../images/icon1.png';
import icon2 from '../images/icon2.png';

const Navbar = () => {
  const [isScrolled, setIsScrolled] = useState(false);

  useEffect(() => {
    const handleScroll = () => {
      setIsScrolled(window.scrollY > 0);
    };

    window.addEventListener('scroll', handleScroll);
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  const textColor = isScrolled ? 'text-white' : 'text-purple-950';

  return (
    <>
      <nav
        className={`fixed top-0 w-full z-50 flex justify-between items-center p-4 transition-colors duration-300 ${
          isScrolled ? 'bg-purple-950' : 'bg-purple-300'
        }`}
      >
        <Link to="/" className={`text-2xl font-bold flex items-center gap-2 ${textColor}`}>
          <img src={isScrolled ? icon2 : icon1} alt="" className="w-[35px]" />
          Dogtober
        </Link>

        <ul className="flex gap-6 font-medium">
          <li>
            <Link to="/" className={textColor}>Home</Link>
          </li>
          <li>
            <Link to="/services" className={textColor}>Services</Link>
          </li>
          <li>
            <Link to="/training" className={textColor}>Training</Link>
          </li>
          <li>
            <Link to="/medcare" className={textColor}>Med Care</Link>
          </li>
        </ul>

        <Link to="/signup">
          <button className="bg-purple-950 text-white px-5 py-2 rounded-[10px]">
            Sign Up
          </button>
        </Link>

      </nav>

      <div className="">
        <Outlet />
      </div>
    </>
  );
};

export default Navbar;
