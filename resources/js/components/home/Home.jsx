import React from 'react'
import Navbar from './navbar'
import AboutSection from './AboutSection'
import HeroSection from './HeroSection'
import FeaturesSection from './FeaturesSection'
import AdoptionSection from './adopSection'
import PetDoctorBenefits from './visitDoctor'
import OurServices from './ourservices'
import Footer from './footer'

const Home = () => {
  return (
    <div>
      
      <Navbar />
      <HeroSection />
      <FeaturesSection/>
      <AdoptionSection/>
      <AboutSection />
      <PetDoctorBenefits/>
      <OurServices/>
      <Footer />
    </div>
  )
}

export default Home
