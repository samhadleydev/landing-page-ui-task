import React from 'react'
import { __ } from "@wordpress/i18n";
import { useState } from 'react';
import Dynamictext from './ui-components/Dynamictext';
import './dashboard.css';


const Changelog = () => {
	const [toggleState, setToggleState] = useState(1);

	const toggleTab = (index) => {
		setToggleState(index);
	}

	return (
		<>
			<div className="changelog">
				<div className="container">
					<div className="changelog--wrapper">
						<div className="button--wrapper">
							<div className="rishi--btns">
								<button className={toggleState === 1 ? "btn-tabs active-tabs" : "btn-tabs"}
									onClick={() => toggleTab(1)}>
									{__('Theme', 'rishi')}
								</button>
								<button className="tabs"
									className={toggleState === 2 ? "btn-tabs active-tabs" : "btn-tabs"}
									onClick={() => toggleTab(2)}>
									{__('Companion', 'rishi')}
								</button>

								<button className="tabs"
									className={toggleState === 3 ? "btn-tabs active-tabs" : "btn-tabs"}
									onClick={() => toggleTab(3)}>
									{__('PRO', 'rishi')}
								</button>
							</div>

							<div className="logs">
								<div><Dynamictext letterStyle="light--green">
								{__('n', 'rishi')}</Dynamictext>{__('New', 'rishi')}</div>
								<div><Dynamictext letterStyle="light--yellow">
								{__('F', 'rishi')}</Dynamictext>{__('Fix', 'rishi')}</div>
								<div><Dynamictext letterStyle="light--blue">
								{__('U', 'rishi')}</Dynamictext>{__('Update', 'rishi')}</div>
							</div>
						</div>

						<div className="content--wrapper" className={toggleState === 1 ? "content  active-content" : "content"} >
							<div className="main--details">
								<div className="rishi--versions">
									<div className="version--title">
										<h5>{__('Version: 1.7.71', 'rishi')}</h5>
									</div>
									<div className="relase-date">
										<p>{__('Released on February 24, 2021', 'rishi')}</p>
									</div>
								</div>
								<div className="details">
									<div className="text-wrap">   <Dynamictext letterStyle="light--green">
									{__('n', 'rishi')} </Dynamictext> <p> {__('Validation issue with ontouchmove attribute', 'rishi')} </p> </div>
									<div className="text-wrap">
										<Dynamictext letterStyle="light--yellow">
										{__('f', 'rishi')}</Dynamictext>  <p> {__('WooCommerce small improvements', 'rishi')} </p> </div>

									<div className="text-wrap">   <Dynamictext letterStyle="light--blue">
									{__('u', 'rishi')}</Dynamictext> <p>  {__('Archives grid CSS', 'rishi')} </p>  </div>

									<div className="text-wrap">   <Dynamictext letterStyle="light--green">
									{__('n', 'rishi')}</Dynamictext> <p>  {__('Social icons official color', 'rishi')} </p> </div>

									<div className="text-wrap">   <Dynamictext letterStyle="light--green">
									{__('n', 'rishi')}</Dynamictext> <p>  {__('Unique widgets ID not outputted', 'rishi')} </p> </div>

								</div>

							</div>
							<div className="main--details">
								<div className="rishi--versions">
									<div className="version--title">
										<h5>{__('Version: 1.7.70', 'rishi')}</h5>
									</div>
									<div className="relase-date">
										<p>{__('Released on February 22, 2021', 'rishi')}</p>
									</div>
								</div>
								<div className="details">
									<div className="text-wrap">   <Dynamictext letterStyle="light--green">
									{__('n', 'rishi')}</Dynamictext> <p> {__('Breadcrumbs - add support for SEO plugins breadcrumbs', 'rishi')} </p> </div>
									<div className="text-wrap">
										<Dynamictext letterStyle="light--yellow">
										{__('f', 'rishi')}</Dynamictext>  <p> {__('Support for adjust the quantity input values filter', 'rishi')} </p> </div>

									<div className="text-wrap">   <Dynamictext letterStyle="light--blue">
									{__('u', 'rishi')}</Dynamictext> <p>  {__('Add label options for Account, Cart, Search and Wishlist items', 'rishi')} </p>  </div>

									<div className="text-wrap">   <Dynamictext letterStyle="light--green">
									{__('N', 'rishi')}</Dynamictext> <p>  {__('Thinner Search icon', 'rishi')} </p> </div>

									<div className="text-wrap">   <Dynamictext letterStyle="light--green">
									{__('n', 'rishi')}</Dynamictext> <p>  {__('Respect primary category in breadcrumbs for RankMath, SEOPress, The Seo Framework and WPSEO', 'rishi')} </p> </div>

									<div className="text-wrap">   <Dynamictext letterStyle="light--green">
									{__('n', 'rishi')}</Dynamictext> <p>  {__('Link type 4 and 5 text color', 'rishi')} </p> </div>

									<div className="text-wrap">   <Dynamictext letterStyle="light--green">
									{__('n', 'rishi')}</Dynamictext> <p>  {__('Dropdown color when input color is set to transparent', 'rishi')} </p> </div>

								</div>

							</div>
						</div>
						<div className="content---wrapper" className={toggleState === 2 ? "content  active-content" : "content"}>
							<h1>{__('Just a dummy content for the companion tab', 'rishi')}</h1>
						</div>

						<div className="content---wrapper" className={toggleState === 3 ? "content  active-content" : "content"}>
							<h1>{__('Just a dummy content for the PRO RISHI THEME', 'rishi')}</h1>
						</div>
					</div>
				</div>
			</div>
		</>
	)
}

export default Changelog;
