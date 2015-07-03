using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;
using Microsoft.Azure;
using SMSServer.Models;
using Twilio;

namespace SMSServer.Controllers
{
    public class SMSController : ApiController
    {
        /// <summary>
        /// Sends a single SMS message
        /// </summary>
        /// <param name="message">The message to be sent</param>
        /// <returns>Response Code OK</returns>
        [HttpPost]
        public IHttpActionResult Send(MessageModel message)
        {
            string AccountSid = CloudConfigurationManager.GetSetting("AccountSid");
            string AuthToken = CloudConfigurationManager.GetSetting("AuthToken");
            string FromNumber = CloudConfigurationManager.GetSetting("FromNumber");

            var twilio = new TwilioRestClient(AccountSid, AuthToken);

            var twilioMessage = twilio.SendMessage(FromNumber, message.ToNumber, message.Text);
            Console.WriteLine(twilioMessage.Sid);

            return Ok();
        }
    }
}
