import React, { useState } from 'react';
import { __ } from "@wordpress/i18n";
import Button from './ui-components/Button';
import icons, { QuestionMark } from './ui-components/Icons';

// const Botton = (props) => {
//     let className = props.className // this will be the className sent from <Button>
//     return
//     <botton className={className}></botton>
// }

const Extensions = (props) => {

	const [toggleState, setToggleState] = useState(1);

	const toggleTab = (index) => {
		setToggleState(index);
	}

	return (
		<>
			<div className="extension--wrapper">
				<div className="container">
					<div className="content--wrapper--grid">
						<div className="button--wrapper">
							<button className={toggleState === 1 ? "btn-tabs active-tabs" : "btn-tabs"}
								onClick={() => toggleTab(1)}>
								{__('Free Extensions', 'rishi')}
							</button>
							<button className="tabs"
								className={toggleState === 2 ? "btn-tabs active-tabs" : "btn-tabs"}
								onClick={() => toggleTab(2)}>
								{__('Pro Extensions', 'rishi')}
							</button>
						</div>

						<div className="content--wrapper" className={toggleState === 1 ? "content  active-content" : "content"}>
							<div className="rishi--card">
								<div className="details--wrapper">
									<div className="title">
										<h4> {__('Cookies Consent', 'rishi')}</h4>
									</div>
									<div className="extensions--desc">
										<p> {__('Enable this extension in order to comply with the GDPR regulations.', 'rishi')}</p>
									</div>
								</div>

								<div className="rishi--btn--wrapper">
									<Button buttonStyle='btn--secondary'>{__('Deactivate', 'rishi')}</Button>
									<Button buttonStyle='btn--secondary'> {__('Configure', 'rishi')} </Button>
									<span> {<QuestionMark />}   </span>
								</div>

							</div>
							<div className="rishi--card">
								<div className="details--wrapper">
									<div className="title">
										<h4> {__('Widgets', 'rishi')}</h4>
									</div>
									<div className="extensions--desc">
										<p> {__('Popular/Recent Posts, Advertisement, Contact Info, Mailchimp Subscribe, Social Icons and more', 'rishi')}</p>
									</div>
								</div>

								<div className="rishi--btn--wrapper">
									<Button>{__('Activate', 'rishi')}</Button>
									<span> {<QuestionMark />}   </span>
								</div>

							</div>
						</div>

						<div
							className={toggleState === 2 ? "content  active-content" : "content"}
						>
							<h2>Content 2</h2>
							<p>
								Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente
								voluptatum qui adipisci.
							</p>
						</div>
					</div>
				</div>
			</div>
		</>
	)
}

export default Extensions;
