            <form action="{{route('myreports.view',)}}" method="get">
                  <button type="submit" class="{{ request()->routeIs('myreports.view') ? 'border-b-2 border-blue-700 text-blue-700' : 'text-black border-b-2' }} font-medium text-lg px-5 py-2.5 text-center me-2 mb-2  hover:text-blue-700 hover:border-blue-700 transition duration-300">
                  My Reports
             </button> 
             </form>
             <form action="{{route('historical.view')}}" method="get">
                  <button type="submit" class="{{ request()->routeIs('historical.view') ? 'border-b-2 border-blue-700 text-blue-700' : 'text-black border-b-2' }} font-medium text-lg px-5 py-2.5 text-center me-2 mb-2  hover:text-blue-700 hover:border-blue-700 transition duration-300">
                    Historical Data Report
             </button> 
             </form>
             <form action="{{route('casualtiesReport.view')}}" method="get">
                  <button type="submit" class="{{ request()->routeIs('casualtiesReport.view') ? 'border-b-2 border-blue-700 text-blue-700' : 'text-black border-b-2' }} font-medium text-lg px-5 py-2.5 text-center me-2 mb-2  hover:text-blue-700 hover:border-blue-700 transition duration-300">
                 Casualties Report
             </button> 
             </form>
             <form action="{{route('damagedpropeties.view')}}" method="get">
                  <button type="submit" class="{{ request()->routeIs('damagedpropeties.view') ? 'border-b-2 border-blue-700 text-blue-700' : 'text-black border-b-2' }} font-medium text-lg px-5 py-2.5 text-center me-2 mb-2  hover:text-blue-700 hover:border-blue-700 transition duration-300">
                Damaged Properties Report
             </button> 
             </form>
             
          