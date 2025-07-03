**Title:** *Station Command*

**Genre:** Sci-Fi Strategy Browser Game

**Overview:**

*Station Command* places the player in the role of the commander of a deep-space orbital station, situated at the edge of known civilization. As the station's supreme authority, the player must manage critical aspects of station operations, balancing economic growth, defense, and expansion in a hostile and resource-scarce sector of space.

**Core Responsibilities:**

1. **Trade & Economy:**

   * Establish and manage trade routes with other stations, factions, and passing freighters.
   * Monitor market fluctuations and supply-demand dynamics to optimize profits.
   * Develop a local economy by constructing commercial hubs and setting tariffs.

2. **Defense & Security:**

   * Equip the station with defense systems: turrets, fighter bays, shield arrays.
   * Recruit and manage security personnel and patrol fleets.
   * Defend against pirate raids, rival factions, and cosmic threats.

3. **Station Expansion:**

   * Construct and upgrade station modules (e.g., research labs, habitation rings, hangars).
   * Allocate power and resources efficiently to sustain growing infrastructure.
   * Customize station layout for strategic and operational advantages.

4. **Resource Extraction:**

   * Deploy mining drones and ships to nearby asteroid belts.
   * Manage raw material intake and refine them for trade or station use.
   * Balance environmental hazards and extraction efficiency.

5. **Finance Management:**

   * Track income and expenditure across departments.
   * Secure funding through missions, contracts, or external investors.
   * Avoid deficits, maintain crew morale, and ensure station sustainability.

## Technology Stack

- **Backend**: PHP 8.x (modular, OOP, namespaced)
- **Database**: MySQL 8.x (InnoDB, strict mode, JSON support)
- **Frontend**: HTML5, Tailwind CSS, Alpine.js
- **Architecture**: Service-oriented MVC; each domain (agent) is an encapsulated module with defined I/O
- **State Management**: Centralized MySQL model with dynamic fields (JSON columns) for flexible simulation state
- **Session & API**: Native PHP sessions (fallback: stateless JWT endpoints)
- **Event Loop**: Time-driven tick system + reactive player input triggers, stored in an `event_queue`


